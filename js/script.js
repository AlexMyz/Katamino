let w = window.screen.availWidth;
if(w > 1000) {
    let fig1 = document.querySelector('.fig1');
    let fig2 = document.querySelector('.fig2');
    let fig3 = document.querySelector('.fig3');
    let fig4 = document.querySelector('.fig4');

    let text = document.querySelector('.greet-scr');
    window.addEventListener('mousemove', function(e) {
        let x = e.clientX / window.innerWidth;
        let y = e.clientY / window.innerHeight;
        fig1.style.transform = 'translate(-' + x * 20 + 'px, -' + y * 20 + 'px';
        fig2.style.transform = 'translate(-' + x * 10 + 'px, -' + y * 10 + 'px';
        fig3.style.transform = 'translate(-' + x * 5 + 'px, -' + y * 5 + 'px';
        fig4.style.transform = 'translate(-' + x * 5 + 'px, -' + y * 5 + 'px';

        text.style.transform = 'translate(-' + x * 5 + 'px, -' + y * 5 + 'px';
    })
}