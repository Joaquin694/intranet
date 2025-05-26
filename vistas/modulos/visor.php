<style>
    nav.navbar.navbar-static-top, .main-footer ,.main-sidebar, .logo{
    display: none !important;
}

</style>
<br><br><br><br><br>
<!-- Contenedor principal para incrustar en tu sección -->
<!-- Contenedor principal para incrustar en tu sección -->
<div class="custom-container" style="background: linear-gradient(135deg, #f0f4f8, #d9e2ec); border-radius: 20px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15); padding: 30px; max-width: 600px; width: 100%; margin: 0 auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div class="header-logo" style="display: flex; justify-content: center; margin-bottom: 25px;">
        <img src="https://localhost/intranet/vistas/img/hole/logo2.png" alt="Logo UCV" style="width: 180px;">
    </div>
    <form id="clientForm">
        <!-- Inputs y estructura del formulario -->
        <div class="form-row" style="margin-bottom: 20px;">
            <div class="form-group col-md-12">
                <label for="dni" style="font-weight: bold; font-size: 18px; color: #333;">Número de Documento de Identidad</label>
                <input type="text" class="form-control" id="dni" name="dni" style="font-size: 20px; padding: 15px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;" required>
            </div>
        </div>
        <div class="form-row hidden" id="clientNameGroup" style="margin-bottom: 20px;">
            <div class="form-group col-md-12">
                <label for="name" style="font-weight: bold; font-size: 18px; color: #333;">Nombre Completo</label>
                <input type="text" class="form-control" id="name" name="name" readonly style="font-size: 20px; padding: 15px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 hidden" id="childNameGroup" style="margin-bottom: 20px;">
                <label for="childName" style="font-weight: bold; font-size: 18px; color: #333;">Nombre del Hijo/Hija</label>
                <input type="text" class="form-control" id="childName" name="childName" style="font-size: 20px; padding: 15px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
            </div>
            <div class="form-group col-md-6 hidden" id="childSurnameGroup" style="margin-bottom: 20px;">
                <label for="childSurname" style="font-weight: bold; font-size: 18px; color: #333;">Apellido del Hijo/Hija</label>
                <input type="text" class="form-control" id="childSurname" name="childSurname" style="font-size: 20px; padding: 15px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 hidden" id="careerGroup" style="margin-bottom: 20px;">
                <label for="career" style="font-weight: bold; font-size: 18px; color: #333;">Carrera</label>
                <input type="text" class="form-control" id="career" name="career" readonly style="font-size: 20px; padding: 15px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
            </div>
            <div class="form-group col-md-6 hidden" id="cycleGroup" style="margin-bottom: 20px;">
                <label for="cycle" style="font-weight: bold; font-size: 18px; color: #333;">Ciclo</label>
                <input type="text" class="form-control" id="cycle" name="cycle" readonly style="font-size: 20px; padding: 15px; border-radius: 10px; box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
            </div>
        </div>

        <!-- Contenedor para mostrar el mensaje final -->
        <div id="finalMessage" class="hidden" style="margin-top: 20px; padding: 20px; border-radius: 12px; text-align: center; font-size: 22px; font-weight: bold; color: #155724;">
            <!-- Mensaje se mostrará aquí -->
        </div>
        
        <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; width: 100%; padding: 15px; font-size: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">Registrar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const clientForm = document.getElementById('clientForm');
        const dniInput = document.getElementById('dni');
        const clientNameGroup = document.getElementById('clientNameGroup');
        const childNameGroup = document.getElementById('childNameGroup');
        const childSurnameGroup = document.getElementById('childSurnameGroup');
        const careerGroup = document.getElementById('careerGroup');
        const cycleGroup = document.getElementById('cycleGroup');
        const nameInput = document.getElementById('name');
        const careerInput = document.getElementById('career');
        const cycleInput = document.getElementById('cycle');
        const finalMessage = document.getElementById('finalMessage');

        // Simulación de datos JSON
        const users = [
            { dni: '48339581', name: 'Juan Perez' },
            { dni: '48339582', name: 'Ana Lopez' },
            { dni: '48339583', name: 'Carlos Sanchez' },
            { dni: '48339584', name: 'Lucia Fernandez' },
            { dni: '48339585', name: 'Mario Gutierrez' }
        ];
        
        dniInput.addEventListener('blur', function() {
            const dni = dniInput.value.trim();
            if (dni) {
                const user = users.find(user => user.dni === dni);
                
                if (user) {
                    nameInput.value = user.name;
                    clientNameGroup.classList.remove('hidden');
                    childNameGroup.classList.remove('hidden');
                    childSurnameGroup.classList.remove('hidden');
                } else {
                    alert('El usuario no existe.');
                }
            }
        });

        clientForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const childName = document.getElementById('childName').value.trim().toLowerCase();
            const childSurname = document.getElementById('childSurname').value.trim().toLowerCase();

            if (childName && childSurname) {
                if (childName === 'josue' && childSurname === 'abad hernandez') {
                    careerInput.value = 'Ingeniería de Sistemas';
                    cycleInput.value = 'II Ciclo';
                    showMessage('De 1 a 5 ciclo', 'Ahora toma asiento y espera tu turno, luego te diriges al ambiente de los guías.', '#f0f8e2');
                } else if (childName === 'gabriel' && childSurname === 'abad hernandez') {
                    careerInput.value = 'Ingeniería de Sistemas';
                    cycleInput.value = '8vo Ciclo';
                    showMessage('De 6 a 12 ciclo', 'Te corresponde ser atendido en el CAP. Ahora toma asiento y espera tu turno.', '#d4edda');
                } else {
                    careerInput.value = 'No especificado';
                    cycleInput.value = 'No especificado';
                    finalMessage.classList.add('hidden');
                }
                careerGroup.classList.remove('hidden');
                cycleGroup.classList.remove('hidden');
            } else {
                alert('Por favor, complete los datos del hijo/hija.');
            }
        });

        function showMessage(cycleRange, message, bgColor) {
            finalMessage.textContent = message;
            finalMessage.style.backgroundColor = bgColor;
            finalMessage.style.color = '#155724'; /* Color de texto para el mensaje */
            finalMessage.classList.remove('hidden');
        }
    });
</script>
