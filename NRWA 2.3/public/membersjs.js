// URL API-ja
const apiUrl = 'http://127.0.0.1:8000/api/members';

// Dohvaćanje elemenata HTML-a
const membersBody = document.getElementById('membersBody');
const createForm = document.getElementById('createForm');
const updateForm = document.getElementById('updateForm');
const searchInput = document.getElementById('searchInput');
const updateId = document.getElementById('updateId');

// Funkcija za dohvaćanje članova
async function fetchMembers(query = '') {
    // Konstruiranje URL-a s opcionalnim query parametrom
    const url = query ? `${apiUrl}?query=${query}` : apiUrl;
    
    try {
        // Asinkrono dohvaćanje podataka iz API-ja
        const response = await axios.get(url);
        const members = response.data;

        // Očistite postojeći sadržaj tablice
        membersBody.innerHTML = '';

        // Prikaz članova u tablici
        members.forEach(member => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${member.id}</td>
                <td>${member.mtype}</td>
                <td>${member.discount}</td>
                <td>${member.duration}</td>
                <td>${member.customer_id}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="editMember(${member.id})">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteMember(${member.id})">Delete</button>
                </td>
            `;

            // Dodavanje retka u tablicu
            membersBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error fetching members:', error);
    }
}

// Funkcija za stvaranje novog člana
createForm.addEventListener('submit', async event => {
    // Spriječavanje podnošenja obrasca
    event.preventDefault();

    const formData = new FormData(createForm);
    const data = Object.fromEntries(formData.entries());

    try {
        // Slanje POST zahtjeva na API
        const response = await axios.post(apiUrl, data);
        // Osvježavanje popisa članova
        fetchMembers();
        // Resetiranje obrasca
        createForm.reset();
        // Prikaz poruke
        alert(response.data.message);
    } catch (error) {
        console.error('Failed to create member:', error);
        alert('Failed to create member');
    }
});

// Funkcija za uređivanje člana
async function editMember(id) {
    try {
        const response = await axios.get(`${apiUrl}/${id}`);
        const member = response.data;

        // Postavljanje vrijednosti za ažuriranje
        updateId.value = member.id;
        document.getElementById('updateMtype').value = member.mtype;
        document.getElementById('updateDiscount').value = member.discount;
        document.getElementById('updateDuration').value = member.duration;
        document.getElementById('updateCustomerId').value = member.customer_id;
    } catch (error) {
        console.error('Failed to fetch member details:', error);
        alert('Failed to fetch member details');
    }
}

// Funkcija za ažuriranje člana
updateForm.addEventListener('submit', async event => {
    event.preventDefault();

    const id = updateId.value;
    const formData = new FormData(updateForm);
    const data = Object.fromEntries(formData.entries());

    try {
        const response = await axios.put(`${apiUrl}/${id}`, data);
        fetchMembers(); // Osvježavanje popisa članova
        updateForm.reset(); // Resetiranje obrasca
        alert(response.data.message); // Prikaz poruke
    } catch (error) {
        console.error('Failed to update member:', error);
        alert('Failed to update member');
    }
});

// Funkcija za brisanje člana
async function deleteMember(id) {
    try {
        const response = await axios.delete(`${apiUrl}/${id}`);
        fetchMembers(); // Osvježavanje popisa članova
        alert(response.data.message); // Prikaz poruke
    } catch (error) {
        console.error('Failed to delete member:', error);
        alert('Failed to delete member');
    }
}

// Pretraživanje članova
searchInput.addEventListener('input', async () => {
    const query = searchInput.value;
    fetchMembers(query);
});

// Dohvaćanje članova kada se stranica učita
fetchMembers();
