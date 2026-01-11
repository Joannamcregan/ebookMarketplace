class FrontDisplay {

    constructor() {
        this.leaves = document.querySelectorAll('.expandable-leaf');
        this.introOverlay = document.getElementById('intro-overlay');
        this.closeValuesOverlayButtons = document.querySelectorAll('#values-overlay__close');
        this.closeValuesOverlayButton = document.getElementById('values-overlay__close');
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
        this.closeValuesOverlayButtons.forEach(button => {
            button.addEventListener('click', this.closeValuesOverlay.bind(this));
        });
    }

    closeValuesOverlay(){
        this.introOverlay.classList.remove('flex');
        this.introOverlay.classList.add('hidden');
        event.preventDefault();
    }
}

export default FrontDisplay;