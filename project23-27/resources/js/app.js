
import './bootstrap';

// Активация всех dropdown
document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
    new bootstrap.Dropdown(toggle);
});
