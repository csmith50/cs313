var shirt1 = false;
var shirt2 = false;
var pants1 = false;
var pants2 = false;
var shoes1 = false;
var shoes2 = false;
var total = 0.00;
var phone = false;
var cardNum = false;
var expDate = false;

function resetting() {
    total = 0.00;
    document.getElementById("total").value = "$" + total;
    removeError();
    shirt1 = false;
    shirt2 = false;
    pants1 = false;
    pants2 = false;
    shoes1 = false;
    shoes2 = false;
}

function removeError() {
    document.getElementById("error").innerHTML = "";
}

function flip(value) {
    var newValue = false;
    if (value == false)
        newValue = true;
    return newValue;
}

function shirt1Add() {
    shirt1 = flip(shirt1);
    if (shirt1 == true)
        total += 20.00;
    else
        total -= 20.00;
    document.getElementById("total").innerHTML = "total $" + total;
}

function shirt2Add() {
    shirt2 = flip(shirt2);
    if (shirt2 == true)
        total += 20.00;
    else
        total -= 20.00;
    document.getElementById("total").innerHTML = "total $" + total;
}

function pants1Add() {
    pants1 = flip(pants1);
    if (pants1 == true)
        total += 3500.00;
    else
        total -= 3500.00;
    document.getElementById("total").innerHTML = "total $" + total;
}

function pants2Add() {
    pants2 = flip(pants2);
    if (pants2 == true)
        total += 20.00;
    else
        total -= 20.00;
    document.getElementById("total").innerHTML = "total $" + total;
}

function shoes1Add() {
    shoes1 = flip(shoes1);
    if (shoes1 == true)
        total += 20.00;
    else
        total -= 20.00;
    document.getElementById("total").innerHTML = "total $" + total;
}

function shoes2Add() {
    shoes2 = flip(shoes2);
    if (shoes2 == true)
        total += 20.00;
    else
        total -= 20.00;
    document.getElementById("total").innerHTML = "total $" + total;
}

function checkPhone() {
    var number = document.getElementById("phoneNum").value;
    if (number == "")
        removeError();
    else if (number.search(/\d{3}-\d{3}-\d{4}/) >= 0) {
        phone = true;
        removeError();
    }
    else {
        phone = false;
        document.getElementById("error").innerHTML = "Please enter a valid phone number";
        document.getElementById("phoneNum").focus();
    }
}

function checkCard() {
    var number = document.getElementById("cardNum").value;
    if (number == "") {
        removeError();
    }
    else if (number.search(/\d{16}/) >= 0) {
        cardNum = true;
        removeError();
    }
    else {
        cardNum = false;
        document.getElementById("error").innerHTML = "Please enter a valid credit card number";
        document.getElementById("cardNum").focus();
    }
}

function checkDate() {
    var date = document.getElementById("cardDate").value;
    if (date == "")
        removeError();
    else if (date.search(/[0-2][1-9]\/1[2-9]/) >= 0) {
        expDate = true;
        removeError();
    }
    else {
        expDate = false;
        document.getElementById("error").innerHTML = "Please enter a valid experation date";
        document.getElementById("cardDate").focus();
    }
}

function formCheck() {
    if (document.getElementById("firstname").value == "") {
        document.getElementById("error").innerHTML = "Please enter a first name";
        return false;
    }
    else if (document.getElementById("lastname").value == "") {
        document.getElementById("error").innerHTML = "please enter a last name";
        return false;
    }
    else if (document.getElementById("address").value == "") {
        document.getElementById("error").innerHTML = "please enter an address";
        return false;
    }
    else if (!expDate || !cardNum || !phone) {
        document.getElementById("error").innerHTML = "missing required info";
        return false;
    }
    else
        return true;
}