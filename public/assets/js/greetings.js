function updateGreeting() {
    const greetingElement = document.getElementById('greeting');
    const weatherIconElement = document.getElementById('weather-icon');
    const now = new Date();
    const hours = now.getHours();

    let greeting;
    let iconClass;
    let colorClass;

    if (hours >= 5 && hours < 12) {
        greeting = 'Selamat Pagi Sayangku';
        iconClass = 'fas fa-sun'; // Morning icon
        colorClass = 'morning-color';
    } else if (hours >= 12 && hours < 15) {
        greeting = 'Selamat Siang Sayangku';
        iconClass = 'fas fa-sun'; // Afternoon icon
        colorClass = 'afternoon-color';
    } else if (hours >= 15 && hours < 18) {
        greeting = 'Selamat Sore Sayangku';
        iconClass = 'fas fa-cloud-sun'; // Evening icon
        colorClass = 'evening-color';
    } else {
        greeting = 'Selamat Malam Sayangku';
        iconClass = 'fas fa-cloud-moon'; // Night icon
        colorClass = 'night-color';
    }

    greetingElement.textContent = greeting;
    weatherIconElement.className = `${iconClass} ${colorClass}`;
}

updateGreeting();
