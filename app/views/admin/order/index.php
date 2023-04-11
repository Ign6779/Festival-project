<? include __DIR__ . '/../adminheader.php' ?>

<table class="container table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Payment method</th>
            <th scope="col">Time of purchase</th>
            <th scope="col">Buttons</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>

<script>
    window.onload = refresh();

    function refresh() {
        document.getElementsByTagName("tbody")[0].innerHTML = "";
        fetch('http://localhost/api/order')
            .then(result => result.json())
            .then((data) => {
                console.log(data);
                Object.values(data).forEach(load);
            }).catch(err => console.error(err));
    }

    function load(orderInput) {
        var tbody = document.getElementsByTagName("tbody")[0];
        tr = document.createElement("tr");

        tdId = document.createElement("td");
        tdId.innerHTML = orderInput.id;

        tdUsername = document.createElement("td");
        tdUsername.innerHTML = orderInput.username;

        tdAmount = document.createElement("td");
        tdAmount.innerHTML = orderInput.amount;

        tdStatus = document.createElement("td");
        tdStatus.innerHTML = orderInput.status;

        tdPaymentMethod = document.createElement("td");
        tdPaymentMethod.innerHTML = orderInput.payment_method;

        tdTimeOfPurchase = document.createElement("td");
        tdTimeOfPurchase.innerHTML = orderInput.time_of_purchase;

        tdButtons = document.createElement("td");
        rEdit = document.createElement("a");
        rEdit.className = "btn btn-warning me-2";
        rEdit.innerHTML = "Edit";
        rEdit.href = "/order/editOrderForm?orderId=" + orderInput.id;

        rDownloadPdf = document.createElement("button");
        rDownloadPdf.className = "btn btn-warning me-2";
        rDownloadPdf.innerHTML = "DownloadPdf";
        rDownloadPdf.addEventListener('click', function () {
            exportToPDF(orderInput);
        });

        rExport = document.createElement("a");
        rExport.className = "btn btn-warning me-2";
        rExport.innerHTML = "Export";

        tdButtons.append(rEdit, rDownloadPdf, rExport);
        tr.append(tdId, tdUsername, tdAmount, tdStatus, tdPaymentMethod, tdTimeOfPurchase, tdButtons);
        tbody.appendChild(tr);
    }

    function exportToPDF(orderInput) {
  // Create a new jsPDF instance
  var doc = new jsPDF();

  // Add orderInput data to the PDF
  doc.text(10, 10, 'Username: ' + orderInput.username);
  doc.text(10, 20, 'Amount: ' + orderInput.amount);
  doc.text(10, 30, 'Status: ' + orderInput.status);
  doc.text(10, 40, 'Payment Method: ' + orderInput.payment_method);
  doc.text(10, 50, 'Time of Purchase: ' + orderInput.time_of_purchase);

  // Convert the PDF to a Blob
  var blob = doc.output('blob');

  // Create a download link element
  var downloadLink = document.createElement('a');
  downloadLink.href = URL.createObjectURL(blob);
  downloadLink.download = 'order.pdf';

  // Append the download link to the document and trigger a click event
  document.body.appendChild(downloadLink);
  downloadLink.click();

  // Clean up: remove the download link and revoke the Blob URL
  document.body.removeChild(downloadLink);
  URL.revokeObjectURL(downloadLink.href);
}

</script>