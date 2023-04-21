var seats = [];
var seatCodes = [
    "STA",
    "STP",
    "STC",
    "FCA",
    "FCP",
    "FCC"
];

function navBarControl() {
    var navLinks = document.getElementsByTagName("nav")[0].getElementsByTagName("a");
    var sections = document.getElementsByTagName("section");
    for (let s = 0; s < sections.length; s++) {
      var sectionTop = sections[s].offsetTop - 1;
      var sectionBottom = sectionTop + sections[s].offsetHeight - 1;
      if (window.scrollY >= sectionTop && window.scrollY <= sectionBottom) {
        navLinks[s].classList.add("current");
      } else {
        navLinks[s].classList.remove("current");
      }
    }
}

function seatUpdate() {
    var seatData = document.getElementsByTagName("select");
    for (let i = 0; i < seatCodes.length; i++) {
        seats[i] = 
        {
            code: seatCodes[i],
            qty: seatData[i].value,
            fullPrice: parseFloat(seatData[i].dataset.fullprice),
            discPrice: parseFloat(seatData[i].dataset.discprice)   
        }
    }
}

function checkSeats() {
    seatUpdate();
    var isSelection = false;

    for (let i = 0; i < seatCodes.length; i++) {
        if (seats[i].qty >= 1)
            isSelection = true;
    }

    return isSelection;
}

function checkTimes() {
    var isATime = false;
    var times = document.getElementsByClassName("time");

    for (let i = 0; i < times.length; i++) {
        if (times[i].checked)
        isATime = true;
    }

    return isATime;
}

function checkValid() {
    var seats = checkSeats();
    var time = checkTimes();
    var valid = false;

    showError(seats, time)
    
    if (seats && time)
        valid = true;
    
    return valid;
}

function showError(seats, time) {
    if (!seats)
        document.getElementById("noseats").classList.add("isError");
    else
        document.getElementById("noseats").classList.remove("isError");
    if (!time)
        document.getElementById("noscreen").classList.add("isError");
    else
        document.getElementById("noseats").classList.remove("isError");
}

function calcTotalPrice() {
    var selected;
    var totalPrice = 0;
    var priceTable = document.getElementById("pricetable");

    if (checkSeats() && checkTimes()) {
        priceContents = "<br><table><thead><tr><th>Seat Code</th>"
        + "<th>Quantity</th><th>Total</th></tr></thead><tbody>";
        var subTotal;
        var times = document.getElementsByClassName("time");
        for (let i = 0; i < times.length; i++) {
            if (times[i].checked)
                selected = times[i].dataset.pricing;
        }

        for (let i = 0; i < seatCodes.length; i++) {
            if (seats[i].qty >= 1) {
                if (selected == "discprice")
                    subTotal = seats[i].discPrice*seats[i].qty;
                else if (selected == "fullprice")
                    subTotal = seats[i].fullPrice*seats[i].qty;
                totalPrice += subTotal;
                priceContents += `<tr><td>${seats[i].code}</td>`
                    + `<td>${seats[i].qty}</td><td>\$${subTotal.toFixed(2)}</td></tr>`
            }
        }
        priceContents += `</tbody><tfoot><tr><td colspan="2">TOTAL:</td>`
            + `<td>\$${totalPrice.toFixed(2)}</td></tr></tfoot></table>`;
        priceTable.innerHTML = priceContents;
    }
    else
        priceTable.innerHTML = "";
}

/* Checks localStroage for pre-stored user data. Checkbox will pre-check if
    user data exists in localStorage and correct label will appear accordingly
*/
function recallUser() {
    if (localStorage.getItem("name") == null
    && localStorage.getItem("email") == null
    && localStorage.getItem("phone") == null) {
        document.getElementById("remlabel").innerHTML = "Remember Me";
        document.getElementById("remember-forget").checked = false;
    } else {
        document.getElementById("user[name]").value = localStorage.getItem("name");
        document.getElementById("user[email]").value = localStorage.getItem("email");
        document.getElementById("user[mobile]").value = localStorage.getItem("mobile");
        document.getElementById("remember-forget").checked = true;
        document.getElementById("remlabel").innerHTML = "Forget Me";
    }
}

/* Saves or removes local storage data when "remember me" or "forget me" is
    checked or unchecked
*/
function rememberForget(check) {
    if (check.checked) {
        document.getElementById("remlabel").innerHTML = "Forget Me";
        localStorage["name"] = document.getElementById("user[name]").value;
        localStorage["email"] = document.getElementById("user[email]").value;
        localStorage["mobile"] = document.getElementById("user[mobile]").value;
    } else {
        document.getElementById("remlabel").innerHTML = "Remember Me";
        localStorage.removeItem("name");
        localStorage.removeItem("email");
        localStorage.removeItem("mobile");
    }
}