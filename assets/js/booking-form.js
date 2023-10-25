
    // Get a reference to the form element
    const bookingForm = document.querySelector('.booking-form');

    // Function to validate the form
    function validateForm() {
        const fullName = document.getElementById('fullname').value;
        const mobile = document.getElementById('mobile').value;
        const age = document.getElementById('age').value;
        const fromdate = document.getElementById('fromdate').value;
        const fromtime = document.getElementById('fromtime').value;
        const returndate = document.getElementById('returndate').value;
        const returntime = document.getElementById('returntime').value;
       // const pickuplocation = document.getElementById('pickuplocation').value;
       // const returnlocation = document.getElementById('returnlocation').value;
        const license = document.getElementById('license').value;
        const message = document.querySelector('textarea[name="message"]').value;

        // Define regular expressions for validation
        const mobileRegex = /^[0-9]{10}$/; // 10-digit mobile number
        const ageRegex = /^[0-9]+$/; // Numeric age
        const dateRegex = /^\d{4}-\d{2}-\d{2}$/; // Date in YYYY-MM-DD format
        const timeRegex = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/; // Time in HH:MM format

        // Validation checks
        if (fullName === "") {
            alert("Please enter your full name.");
            return false;
        }

        if (!mobile.match(mobileRegex)) {
            alert("Please enter a valid 10-digit mobile number.");
            return false;
        }

        if (!age.match(ageRegex)) {
            alert("Please enter a valid age.");
            return false;
        }

        if (!fromdate.match(dateRegex)) {
            alert("Please enter a valid 'From Date' in YYYY-MM-DD format.");
            return false;
        }

        if (!fromtime.match(timeRegex)) {
            alert("Please enter a valid 'From Time' in HH:MM format.");
            return false;
        }

        if (!returndate.match(dateRegex)) {
            alert("Please enter a valid 'Return Date' in YYYY-MM-DD format.");
            return false;
        }

        if (!returntime.match(timeRegex)) {
            alert("Please enter a valid 'Return Time' in HH:MM format.");
            return false;
        }

        //if (pickuplocation === "") {
       //     alert("Please select a pickup location.");
        //    return false;
        //}

        //if (returnlocation === "") {
          //  alert("Please select a return location.");
            //return false;
        //}

        if (license === "") {
            alert("Please upload your driver's license.");
            return false;
        }

        if (message === "") {
            alert("Please enter a message.");
            return false;
        }

        // If all checks pass, the form is valid
        return true;
    }

    // Add a form submit event listener
    bookingForm.addEventListener('submit', function (e) {
        if (!validateForm()) {
            e.preventDefault(); // Prevent form submission if validation fails
        }
    });
