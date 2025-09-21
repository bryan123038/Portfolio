document.addEventListener('DOMContentLoaded', () => {
    // URL endpoint API
    const API_URL = '/api/index.php'; 

    async function fetchPortfolioData() {
        try {
            const response = await fetch(API_URL);
            if (!response.ok) {
                throw new Error('Gagal memuat data portofolio.');
            }
            const data = await response.json();
            renderPortfolio(data);
        } catch (error) {
            console.error(error);
            // Tampilkan pesan error di UI jika perlu
        }
    }

    function renderPortfolio(data) {
        // Render data profil
        document.getElementById('profile-name').textContent = data.profile.name;
        document.getElementById('profile-title').textContent = data.profile.title;
        document.getElementById('profile-image').src = data.profile.image;
        document.getElementById('profile-bio').textContent = data.profile.bio;

        // Render data proyek
        const projectsContainer = document.getElementById('projects-container');
        projectsContainer.innerHTML = ''; // Kosongkan kontainer sebelum mengisi

        data.projects.forEach(project => {
            const projectCard = document.createElement('div');
            projectCard.classList.add('project-card');

            const technologiesString = project.technologies.join(', ');

            projectCard.innerHTML = `
                <img src="${project.image}" alt="Proyek ${project.title}">
                <div class="project-info">
                    <h3>${project.title}</h3>
                    <p>${project.description}</p>
                    <p class="technologies">Teknologi: ${technologiesString}</p>
                </div>
            `;
            projectsContainer.appendChild(projectCard);
        });
    }

    // Panggil fungsi untuk mengambil dan merender data
    fetchPortfolioData();
});