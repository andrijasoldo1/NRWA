// URL vašeg REST API-a na lokalnom hostu
const apiUrl = 'http://127.0.0.1:8000/api/individuals';

// Funkcija za dohvaćanje svih individuala
function fetchIndividuals() {
    $.ajax({
        url: apiUrl,
        type: 'GET',
        success: function(data) {
            const individualsTbody = $('#individuals-tbody');
            individualsTbody.empty();

            data.forEach(individual => {
                const row = `
                    <tr>
                        <td>${individual.id}</td>
                        <td>${individual.name}</td>
                        <td>${individual.ssn}</td>
                        <td>${individual.owner_id}</td>
                        <td>
                            <button class="btn btn-warning update-btn" data-id="${individual.id}">Ažuriraj</button>
                            <button class="btn btn-danger delete-btn" data-id="${individual.id}">Obriši</button>
                        </td>
                    </tr>
                `;
                individualsTbody.append(row);
            });

            // Dodajte event listener-e za gumbe Ažuriraj i Obriši
            $('.update-btn').on('click', handleUpdate);
            $('.delete-btn').on('click', handleDelete);
        },
        error: function(error) {
            console.error('Greška prilikom dohvaćanja individuala:', error);
        }
    });
}

// Funkcija za stvaranje novog individuala
function createIndividual(event) {
    event.preventDefault();

    const name = $('#name').val();
    const ssn = $('#ssn').val();
    const owner_id = $('#owner_id').val();

    $.ajax({
        url: apiUrl,
        type: 'POST',
        data: {
            name: name,
            ssn: ssn,
            owner_id: owner_id
        },
        success: function(data) {
            console.log('Novi individual stvoren:', data);
            fetchIndividuals(); // Ažurirajte prikaz liste individuala
        },
        error: function(error) {
            console.error('Greška prilikom stvaranja novog individuala:', error);
        }
    });
}

// Funkcija za ažuriranje individuala
function handleUpdate(event) {
    const id = $(event.currentTarget).data('id');
    // Preuzmite podatke individuala s danim ID-om
    $.ajax({
        url: `${apiUrl}/${id}`,
        type: 'GET',
        success: function(individual) {
            // Postavite vrijednosti u formu za ažuriranje
            $('#update-id').val(individual.id);
            $('#update-name').val(individual.name);
            $('#update-ssn').val(individual.ssn);
            $('#update-owner_id').val(individual.owner_id);
            // Prikazat će se forma za ažuriranje
            $('#update-form').show();
            // Dodajte event listener za podnošenje forme
            $('#update-individual-form').off('submit').on('submit', function(event) {
                event.preventDefault();
                const name = $('#update-name').val();
                const ssn = $('#update-ssn').val();
                const owner_id = $('#update-owner_id').val();

                // Izvršite ažuriranje individuala
                $.ajax({
                    url: `${apiUrl}/${id}`,
                    type: 'PUT',
                    data: {
                        name: name,
                        ssn: ssn,
                        owner_id: owner_id
                    },
                    success: function(data) {
                        console.log('Individual ažuriran:', data);
                        fetchIndividuals(); // Ažurirajte prikaz liste individuala
                        $('#update-form').hide(); // Sakrijte formu za ažuriranje
                    },
                    error: function(error) {
                        console.error('Greška prilikom ažuriranja individuala:', error);
                    }
                });
            });
        },
        error: function(error) {
            console.error('Greška prilikom dohvaćanja individuala:', error);
        }
    });
}

// Funkcija za brisanje individuala
function handleDelete(event) {
    const id = $(event.currentTarget).data('id');
    // Potvrdite brisanje
    if (confirm(`Jeste li sigurni da želite obrisati individuala s ID-om ${id}?`)) {
        $.ajax({
            url: `${apiUrl}/${id}`,
            type: 'DELETE',
            success: function(data) {
                console.log('Individual obrisan:', data);
                fetchIndividuals(); // Ažurirajte prikaz liste individuala
            },
            error: function(error) {
                console.error('Greška prilikom brisanja individuala:', error);
            }
        });
    }
}

// Dodavanje event listenera za formu za stvaranje individuala
$('#create-individual-form').on('submit', createIndividual);

// Dohvaćanje i prikaz liste individuala prilikom učitavanja stranice
$(document).ready(function() {
    fetchIndividuals();
});
