document.addEventListener("DOMContentLoaded", () => {

    document.getElementById('btn-menu').addEventListener('click', () => {
        // document.querySelector('.menu-primary-container').classList.toggle('hidden');
        document.querySelector('.menu-primary-container').classList.toggle('block');
      //  document.getElementById('site-navigation').classList.toggle('mobile-navigation');
    })

    // suubmennu mobile
    document.querySelectorAll('.menu-item-has-children').forEach(item => {
        item.addEventListener('click', (e) => {
            // Cegah bubbling agar tidak langsung tutup saat klik child
            e.stopPropagation();

            const submenu = item.querySelector('.sub-menu');

            // Tutup semua sub-menu lainnya jika perlu
            document.querySelectorAll('.menu-item-has-children .sub-menu').forEach(menu => {
                if (menu !== submenu) {
                    menu.classList.remove('open');
                }
            });

            // Toggle open class
            submenu.classList.toggle('open');
        });
    });


    console.log("Hello from my-script.js!");

});


