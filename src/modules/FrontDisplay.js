class FrontDisplay {

    constructor() {
        this.ovals = document.querySelectorAll('.oval');
        this.events();
    }

    events(){
        this.ovals.forEach(oval => {
            oval.addEventListener('click', e => {
                e.preventDefault();
                let parentSection = oval.parentElement.parentElement.querySelector('.sub-oval-section');
                if (parentSection.classList.contains('not-displayed')) {
                    parentSection.classList.remove('not-displayed');
                } else {
                    parentSection.classList.add('not-displayed');
                }
            })
        })
    }
}

export default FrontDisplay;