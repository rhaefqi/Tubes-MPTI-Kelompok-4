const tombol = document.getElementById('tombol-sidebar');
const sidebar = document.getElementById('sidebar');
const title = document.getElementById('head');
const menu = document.getElementById('list');
const logoSide = document.getElementById('logo-side');
const text = document.getElementsByClassName('menu-text');
const logo = document.getElementsByClassName('menu');

// console.log(text)

tombol.addEventListener("click", () => {
    tombol.disabled = true;
    setTimeout(function() {
        tombol.disabled = false;
    }, 500);
    sidebar.classList.toggle('w-56')
    sidebar.classList.toggle('w-20')
    title.classList.toggle('text-[0px]')

    // menu.classList.toggle('mt-[135px]')
    // menu.classList.toggle('px-5')

    if(sidebar.classList.contains('w-20')){
        for (let i = 0; i < text.length; i++) {
            const temp = text[i];
            temp.classList.add('hidden')
        }
        setTimeout(() => {
            logoSide.classList.remove('scale-0')
        }, 300);
    }else{
        setTimeout(() => {
            for (let i = 0; i < text.length; i++) {
                const temp = text[i];
                temp.classList.remove('hidden')
            }
        }, 250);
        logoSide.classList.add('scale-0')
    }

    for (let i = 0; i < logo.length; i++) {
        const temp = logo[i];
        temp.classList.toggle('w-7')
    }

})


// document.addEventListener("DOMContentLoaded", function() {
//     const sidebar = document.getElementById("sidebar");
//     const toggleButton = document.getElementById("tombol-sidebar");
//     const mainContent = document.querySelector(".flex-grow");
//     console.log(mainContent)

//     // Fungsi untuk membuka sidebar
//     function bukaSidebar() {
//         sidebar.classList.remove("-translate-x-full");
//         sidebar.classList.add("translate-x-0");
//         mainContent.classList.add("sm:pl-56"); // Tambahkan padding untuk bagian "main"
//     }

//     // Fungsi untuk menutup sidebar
//     function tutupSidebar() {
//         sidebar.classList.remove("translate-x-0");
//         sidebar.classList.add("-translate-x-full");
//         mainContent.classList.remove("sm:pl-56"); // Hapus padding dari bagian "main"
//     }

//     // Mengecek apakah sidebar terbuka atau tidak
//     const sidebarTerbuka = !sidebar.classList.contains("-translate-x-full");

//     // Jika sidebar terbuka, panggil fungsi bukaSidebar
//     if (sidebarTerbuka) {
//         bukaSidebar();
//     }

//     // Mengatur event listener pada tombol toggle
//     toggleButton.addEventListener("click", function() {
//         const sidebarTerbuka = !sidebar.classList.contains("-translate-x-full");

//         // Jika sidebar terbuka, tutup; jika tidak, buka
//         if (sidebarTerbuka) {
//             tutupSidebar();
//         } else {
//             bukaSidebar();
//         }
//     });
// });


