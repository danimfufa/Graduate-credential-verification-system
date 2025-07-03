// regFormValidation.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('register');
    const fullnameInput = document.getElementById('fullname');
    const usernameInput = document.getElementById('username');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const cpasswordInput = document.getElementById('cpassword');
    const roleSelect = document.getElementById('role');
    const tokenInput = document.querySelector('input[name="token"]');
    const errorDisplay = document.getElementById('error');

    form.addEventListener('submit', function(event) {
        let isValid = true;
        let errors = [];

        // Validate Full Name
        if (fullnameInput.value.trim() === '') {
            errors.push('Full name is required.');
            isValid = false;
        } else if (!/^[a-zA-Z\s]+$/.test(fullnameInput.value.trim())) {
            errors.push('Full name can only contain letters and spaces.');
            isValid = false;
        }

        // Validate Username
        if (usernameInput.value.trim() === '') {
            errors.push('Username is required.');
            isValid = false;
        } else if (!/^[a-zA-Z0-9_]+$/.test(usernameInput.value.trim())) {
            errors.push('Username can only contain letters, numbers, and underscores.');
            isValid = false;
        }

        // Validate Email
        if (emailInput.value.trim() !== '') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                errors.push('Invalid email format.');
                isValid = false;
            }
        } else {
            errors.push('Email is required.');
            isValid = false;
        }

        // Validate Password
        if (passwordInput.value.trim() === '') {
            errors.push('Password is required.');
            isValid = false;
        } else if (passwordInput.value.trim().length < 4) {
            errors.push('Password must be at least 4 characters long.');
            isValid = false;
        }

        // Validate Confirm Password
        if (cpasswordInput.value.trim() === '') {
            errors.push('Confirm password is required.');
            isValid = false;
        } else if (cpasswordInput.value.trim() !== passwordInput.value.trim()) {
            errors.push('Passwords do not match.');
            isValid = false;
        }

        // Validate Role (Select - should always have a value if 'required')
        if (roleSelect.value === '') {
            errors.push('Please select a role.');
            isValid = false;
        }

        // Validate Token (Security Word)
        if (tokenInput.value.trim() === '') {
            errors.push('Security word is required.');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission
            errorDisplay.textContent = errors.join('\n');
        } else {
            errorDisplay.textContent = ''; // Clear any previous errors
            // The form will submit if all validations pass
        }
    });
});