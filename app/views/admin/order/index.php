<? include __DIR__ . '/../adminheader.php' ?>

<div>
    <button class="btn btn-warning me-2" onclick="">Export</button>
</div>

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

        rDownloadPdf = document.createElement("a");
        rDownloadPdf.className = "btn btn-warning me-2";
        rDownloadPdf.innerHTML = "DownloadPdf";
        rDownloadPdf.addEventListener('click', function () {
            exportToPDF(orderInput.id);
        });

        tdButtons.append(rEdit, rDownloadPdf);
        tr.append(tdId, tdUsername, tdAmount, tdStatus, tdPaymentMethod, tdTimeOfPurchase, tdButtons);
        tbody.appendChild(tr);
    }

    function exportToPDF(id) {
        fetch('http://localhost/api/order/test?orderId=' + id)
            .then(result => result.json())
            .then((data) => {
                console.log(data);
            }).catch(err => console.error(err));

        fetch('http://localhost/api/order/download?orderId=' + id)
            .then(response => response.blob())
            .then(blob => {
                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(blob);
                downloadLink.download = 'invoice_' + id + '.pdf';
                downloadLink.style.display = 'none';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
                URL.revokeObjectURL(downloadLink.href);
            })
            .catch(err => console.error(err));
    }

</script>