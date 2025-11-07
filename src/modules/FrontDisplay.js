class FrontDisplay {

    constructor() {
        this.leaves = document.querySelectorAll('.expandable-leaf');
        this.introOverlay = document.getElementById('intro-overlay');
        this.closeOverlayButton = document.getElementById('values-overlay__close');
        this.events();
    }

    events(){
        this.leaves.forEach(leaf => {
            leaf.addEventListener('click', e => {
                e.preventDefault();
                let parentSection = leaf.parentElement.parentElement.querySelector('.sub-leaf-section');
                if (parentSection.classList.contains('not-displayed')) {
                    parentSection.classList.remove('not-displayed');
                } else {
                    parentSection.classList.add('not-displayed');
                }
            })
        });
        this.closeOverlayButton.addEventListener('click', ()=>{
            this.introOverlay.classList.remove('flex');
            this.introOverlay.classList.add('hidden');
        })
    }
}

export default FrontDisplay;