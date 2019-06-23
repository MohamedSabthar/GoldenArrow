<div class="page-holder w-100 d-flex flex-wrap">
    <div class="container-fluid px-xl-5">
        


        

    </div>
</div>

<script>
function setIdToAddPaymentModel(trainerId) {
    document.getElementById("addTrainerId").value = trainerId;
    console.log(trainerId)
}

function viewHistory(trainerId) {
    $.post('/trainerPaymentController/viewSalaryHistory', {
            trainerId
        },
        function(result) {
            $('#salaryHistory').html(result);
            console.log(result);
        });

}

function pass(ammount, paymentDate, salarytId) {
    console.log(paymentDate);
    console.log(ammount);
    document.getElementById("ammountUpdate").value = ammount;
    document.getElementById("paymentDateUpdate").value = paymentDate;

    document.getElementById("salaryIdUpdate").value = salarytId;
}
</script>