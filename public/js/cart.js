$(document).ready(function(){
    disableTimes();
})
function disableTimes(){
    var dateInput = document.getElementById('datepicker');
   var date = new Date();
   var time = date.getHours();
   var tomorrowDate = date.getDate() + 1;
   newDate = date.getFullYear() + "-" + date.getMonth() + "-" + tomorrowDate;
   if(time>=19)
   {
        dateInput.value = newDate;
   }
   var time1 = document.getElementById('time-courier-1');
   var time2 = document.getElementById('time-courier-2');
   var time3 = document.getElementById('time-courier-3');
   var time4 = document.getElementById('time-courier-4');
   var time5 = document.getElementById('time-courier-5');
   var time6 = document.getElementById('time-courier-6');
   if(dateInput.value != newDate)
   {
        if(time>=9)
        {
            time1.disabled = true;
            time2.checked = true;
        }
        if(time>=11)
        {
            time2.disabled = true;
            time3.checked = true;
        }
        if(time>=13)
        {
            time3.disabled = true;
            time4.checked = true;
        }
        if(time>=15)
        {
            time4.disabled = true;
            time5.checked = true;
        }
        if(time>=17)
        {
            time5.disabled = true;
            time6.checked = true;
        }
    }
}
function changeDate(){
    var time1 = document.getElementById('time-courier-1');
    var time2 = document.getElementById('time-courier-2');
    var time3 = document.getElementById('time-courier-3');
    var time4 = document.getElementById('time-courier-4');
    var time5 = document.getElementById('time-courier-5');
    var time6 = document.getElementById('time-courier-6');
    var today = new Date();
    var current_day = today.getDate();
    var newDate = $('#datepicker').datepicker( "getDate" );
    var newDate_day = newDate.getDate();
    if(newDate_day != current_day)
    {
        time1.disabled = false;
        time2.disabled = false;
        time3.disabled = false;
        time4.disabled = false;
        time5.disabled = false;
        time6.disabled = false;
    }
    else{
        disableTimes();
    }
}
function isSameShipping() {
    var chbox;
    chbox=document.getElementById('id_same_billing_shipping');
    var receiver;
    receiver = document.getElementById('receiver');
    if (chbox.checked) {
        receiver.style = "display:none;";
    }
    else {
        receiver.style = "display:block;";
    }
}
function isCourier(){
    var chbox;
    chbox=document.getElementById('courier');
    var selfpick;
    var courierCity;
    var courierAdress;
    selfpick = document.getElementById('selfpickWhere');
    courierCity = document.getElementById('courierCity');
    courierAdress = document.getElementById('courierAddress');
    if(chbox.checked)
    {
        selfpick.style = "display:none";
        courierCity.style = "display:block;";
        courierAdress.style = "display:block;";
    }
}
function isSelf(){
    var chbox;
    chbox = document.getElementById('selfpick');
    var selfpick;
    var courierCity;
    var courierAdress;
    selfpick = document.getElementById('selfpickWhere');
    courierCity = document.getElementById('courierCity');
    courierAdress = document.getElementById('courierAddress');
    if(chbox.checked)
    {
        selfpick.style = "display:block";
        courierCity.style = "display:none;";
        courierAdress.style = "display:none;";
    }
}

    

