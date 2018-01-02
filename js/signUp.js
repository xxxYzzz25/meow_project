window.addEventListener('load', function () {
    let mem = document.getElementById('member');
    let halfMem = document.getElementById('halfMember');
    let signUpForm = document.getElementById('signUpForm');
    mem.addEventListener('click', function toggleAction() {
        mem.classList.add('selected');
        halfMem.classList.remove('selected');
        signUpForm.action = "#123";
    })
    halfMem.addEventListener('click', function toggleAction2() {
        halfMem.classList.add('selected');
        mem.classList.remove('selected');
        signUpForm.action = "#321";
    })
});