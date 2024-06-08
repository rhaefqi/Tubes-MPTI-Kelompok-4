const tombol = document.getElementById('tombol-sidebar');
const sidebar = document.getElementById('sidebar');
const title = document.getElementById('head');
const menu = document.getElementById('list');
const logoSide = document.getElementById('logo-side');
const text = document.getElementsByClassName('menu-text');
const logo = document.getElementsByClassName('menu');
const subBuku = document.getElementById('sub-menu-buku');
const subMenu = document.getElementById("sub-menu");
const arrow = document.getElementById("arrow");
const divArrow = document.getElementById("div-arrow");

tombol.addEventListener("click", () => {
    // buka tutup
    tombol.disabled = true;
    setTimeout(function() {
        tombol.disabled = false;
    }, 500);
    sidebar.classList.toggle('w-56')
    sidebar.classList.toggle('w-20')
    title.classList.toggle('text-[0px]')
    

    if(sidebar.classList.contains('w-20')){
        for (let i = 0; i < text.length; i++) {
            const temp = text[i];
            temp.classList.add('hidden')
        }
        divArrow.classList.add("hidden");
        if (!subMenu.classList.contains('hidden')) {
            subMenu.classList.add('hidden');
        }
        // subBuku.disabled = true;
        setTimeout(() => {
            logoSide.classList.remove('scale-0')
        }, 300);
    }else{
        setTimeout(() => {
            for (let i = 0; i < text.length; i++) {
                const temp = text[i];
                temp.classList.remove('hidden')
            }
            divArrow.classList.remove("hidden");
            if (arrow.classList.contains('rotate-90')) {
                subMenu.classList.remove('hidden');
            }
        }, 250);
        logoSide.classList.add('scale-0')
        // subBuku.disabled = false;
    }
    for (let i = 0; i < logo.length; i++) {
        const temp = logo[i];
        temp.classList.toggle('w-7')
    }

    // hamburger
    const garis1 = document.getElementById("garis-1")
    const garis2 = document.getElementById("garis-2")
    const garis3 = document.getElementById("garis-3")

    garis1.classList.toggle("rotate-45")
    garis3.classList.toggle("-rotate-45")
    garis2.classList.toggle("scale-0")
})

subBuku.addEventListener("click", () =>{
    if (!sidebar.classList.contains('w-20')) {
        arrow.classList.toggle("rotate-90");
        subMenu.classList.toggle("hidden");
    }

})






