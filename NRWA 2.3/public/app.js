// JavaScript code for Banks CRUD App

// URL of your REST API
const API_URL = 'http://localhost:8000/api/banks';

// Get references to DOM elements
const bankForm = document.getElementById('bankForm');
const banksTableBody = document.getElementById('banksTableBody');
const formTitle = document.getElementById('formTitle');
const cancelButton = document.getElementById('cancelButton');

// Load banks when the page loads
document.addEventListener('DOMContentLoaded', loadBanks);

// Function to load banks from the API
function loadBanks() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', API_URL);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const banks = JSON.parse(xhr.responseText);
            displayBanks(banks);
        } else {
            console.error('Failed to load banks:', xhr.responseText);
        }
    };
    xhr.send();
}

// Function to display banks in the table
function displayBanks(banks) {
    banksTableBody.innerHTML = ''; // Clear the table body
    banks.forEach((bank) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${bank.id}</td>
            <td>${bank.bname}</td>
            <td>${bank.city}</td>
            <td>${bank.owner_id}</td>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editBank(${bank.id})">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteBank(${bank.id})">Delete</button>
            </td>
        `;
        banksTableBody.appendChild(row);
    });
}

// Function to handle form submission (adding or updating a bank)
bankForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const bankId = document.getElementById('bankId').value;
    const bankName = document.getElementById('bname').value;
    const bankCity = document.getElementById('city').value;
    const ownerId = document.getElementById('ownerId').value;

    const xhr = new XMLHttpRequest();

    if (bankId) {
        // Update an existing bank
        xhr.open('PUT', `${API_URL}/${bankId}`);
    } else {
        // Add a new bank
        xhr.open('POST', API_URL);
    }

    // Retrieve the CSRF token from the cookies
    const csrfCookie = document.cookie.split(';').find(cookie => cookie.trim().startsWith('XSRF-TOKEN='));
    let csrfToken;
    if (csrfCookie) {
        csrfToken = decodeURIComponent(csrfCookie.split('=')[1]);
    }

    // Set CSRF token in the request header if it exists
    if (csrfToken) {
        xhr.setRequestHeader('X-CSRF-Token', csrfToken);
    } else {
        console.error('Missing CSRF token. Please refresh the page and try again.');
        alert('Missing CSRF token. Please refresh the page and try again.');
        return;
    }

    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            loadBanks();
            bankForm.reset();
            formTitle.textContent = 'Add New Bank';
            document.getElementById('bankId').value = '';
            cancelButton.style.display = 'none';
        } else {
            console.error('Failed to save bank:', xhr.responseText);
        }
    };

    const bankData = {
        bname: bankName,
        city: bankCity,
        owner_id: ownerId
    };

    xhr.send(JSON.stringify(bankData));
});

// Function to edit a bank
function editBank(bankId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `${API_URL}/${bankId}`);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const bank = JSON.parse(xhr.responseText);
            document.getElementById('bankId').value = bank.id;
            document.getElementById('bname').value = bank.bname;
            document.getElementById('city').value = bank.city;
            document.getElementById('owner_id').value = bank.owner_id;

            formTitle.textContent = 'Edit Bank';
            cancelButton.style.display = 'block';
        } else {
            console.error('Failed to load bank:', xhr.responseText);
        }
    };
    xhr.send();
}

// Function to delete a bank
function deleteBank(bankId) {
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `${API_URL}/${bankId}`);
    xhr.onload = function () {
        if (xhr.status === 200) {
            loadBanks();
        } else {
            console.error('Failed to delete bank:', xhr.responseText);
        }
    };
    xhr.send();
}

// Function to cancel edit mode
cancelButton.addEventListener('click', function () {
    formTitle.textContent = 'Add New Bank';
    bankForm.reset();
    document.getElementById('bankId').value = '';
    cancelButton.style.display = 'none';
});
