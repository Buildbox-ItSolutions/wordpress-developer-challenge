function scroll() {


    const section = document.querySelectorAll('[data-content="content"]');

    section.forEach(() => {
        this.addEventListener('wheel', (event) => {
            if (event.deltaY > 0) {
                event.target.scrollBy(300, 0)
            } else {
                event.target.scrollBy(-300, 0)
            }
        })
    })
}

scroll();