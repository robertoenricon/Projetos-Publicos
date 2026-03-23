// Retorna a data de hoje formatada (DD/MM/YYYY)
function getTodayDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const year = today.getFullYear();
    return `${day}/${month}/${year}`;
}

// Dispara a notificação, compatível com Celular e Desktop
function showRenewalNotification(name, renewalDate) {
    const options = {
        body: `A renovação do cliente ${name} está programada para hoje (${renewalDate}).`,
        icon: "https://gestaoclientes.robertoenrico.com.br/assets/images/dashboard-512.png",
        tag: `renewal-${name}`,
        vibrate: [200, 100, 200] // Adiciona uma vibração no celular
    };

    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.ready.then(function(registration) {
            registration.showNotification("Lembrete de Renovação 🔔", options);
        });
    } else {
        const notification = new Notification("Lembrete de Renovação 🔔", options);
        notification.onclick = function() {
            window.focus();
            notification.close();
        };
    }
}

// Verifica a lista e aciona a regra de negócio
function checkDailyRenewals(customers) {
    if (!customers || customers.length === 0) return;

    const todayDate = getTodayDate();

    customers.forEach(customer => {
        if (customer.date === todayDate && customer.status !== "Inativo") {

            const cleanPhone = customer.phone.replace(/\D/g, ''); 
            const notificationKey = `notified_${cleanPhone}_${todayDate}`;

            if (localStorage.getItem(notificationKey) !== "true") {
                if (Notification.permission === "granted") {
                    showRenewalNotification(customer.name, customer.date);
                }
            }
        }
    });
}