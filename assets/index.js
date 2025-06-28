function verificarEjercicio(index) {
    fetch(`ejercicio${index}/verificar_ejercicio${index}.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        }
    })
        .then(response => response.json())
        .then(data => {
            const resultado = document.getElementById('resultado');
            if (data.correcto) {
                resultado.innerHTML = `
                <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; border-left: 4px solid #22c55e;">
                    <strong>¡Excelente! ✅</strong><br>
                    ${data.mensaje}
                </div>
            `;
            } else {
                resultado.innerHTML = `
                <div style="background: #fef2f2; color: #dc2626; padding: 15px; border-radius: 8px; border-left: 4px solid #ef4444;">
                    <strong>¡Ya casi lo logras! ❌</strong><br>
                    ${data.mensaje}
                </div>
            `;
            }
        })
        .catch(error => {
            document.getElementById('resultado').innerHTML = `
            <div style="background: #fef2f2; color: #dc2626; padding: 15px; border-radius: 8px;">
                Error: Asegúrate de que el archivo ejercicio1.php existe en la misma carpeta.
            </div>
        `;
        });
}