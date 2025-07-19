
        const container = document.querySelector('.container');
        const registerBtn = document.querySelector('.register-btn');
        const loginBtn = document.querySelector('.login-btn');

        registerBtn.addEventListener('click', () => {
            container.classList.add('active');
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });

        const syncPointer = ({ x: pointerX, y: pointerY }) => {
            const x = pointerX.toFixed(2);
            const y = pointerY.toFixed(2);
            const xp = (pointerX / window.innerWidth).toFixed(2);
            const yp = (pointerY / window.innerHeight).toFixed(2);
            document.documentElement.style.setProperty('--x', x);
            document.documentElement.style.setProperty('--xp', xp);
            document.documentElement.style.setProperty('--y', y);
            document.documentElement.style.setProperty('--yp', yp);
        };

        document.body.addEventListener('pointermove', syncPointer);
// Función para validar email de manera estricta
function validateEmail(email) {
    // Verificar formato básico
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailRegex.test(email)) {
        return false;
    }

    // Verificar que hay un punto después del @
    const atIndex = email.indexOf('@');
    const afterAt = email.substring(atIndex + 1);

    if (!afterAt.includes('.')) {
        return false;
    }

    // Verificar que no termina con punto
    if (afterAt.endsWith('.')) {
        return false;
    }

    // Verificar que no hay puntos consecutivos
    if (afterAt.includes('..')) {
        return false;
    }

    // Verificar que el dominio tiene al menos 2 caracteres después del último punto
    const lastDotIndex = afterAt.lastIndexOf('.');
    const extension = afterAt.substring(lastDotIndex + 1);

    if (extension.length < 2) {
        return false;
    }

    return true;
}

// Validación para el formulario de login
document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.querySelector('.form-box.login form');
    const registerForm = document.querySelector('.form-box.register form');

    // Validar email en login
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            const emailInput = this.querySelector('input[name="correo"]');
            const email = emailInput.value.trim();

            if (!validateEmail(email)) {
                e.preventDefault();
                alert('Por favor ingresa un correo válido (ejemplo: usuario@dominio.com)');
                emailInput.focus();
                return false;
            }
        });
    }

    // Validar email en registro
    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            const emailInput = this.querySelector('input[name="correo"]');
            const email = emailInput.value.trim();

            if (!validateEmail(email)) {
                e.preventDefault();
                alert('Por favor ingresa un correo válido (ejemplo: usuario@dominio.com)');
                emailInput.focus();
                return false;
            }
        });
    }
});
        