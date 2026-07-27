const teamData = {
    "harpreet-singh": {
        img: 'assets/images/team/harpreet.jpeg',
        description:
            `
        <p class="desc">
        Harpreet Singh wrote a new story of success with his hard work and honesty and made Spedition one of the top companies in India in a short time.
        </p>
        <p class="desc">
        He started his career in 1996 in the logistics industry as a management trainee and worked in several important roles.
        </p>
        <p class="desc">
        In 2018 he founded Spedition and built a strong logistics team trusted by thousands of customers.
        </p>
        `
    },
    "munish-bhardwaj": {
        img: 'assets/images/team/munish.jpeg',
        description:
            `
        <p class="desc">
        Munish Bhardwaj is a Founder Member of Spedition. He is also a qualified logistics expert. He holds an MBA degree in International Logistics & Cargo Management.
        </p>
        <p class="desc">
        Munish Bhardwaj started his career in Logistics Operations in 2004 and the year 2005 he independently handled his first international exhibition logistics project successfully. After that, he has completed thousands of international and national logistics projects to date.
        </p>
        <p class="desc">
        He is a master in handling exhibition logistics. As a team leader, he knows how to plan & execute exhibitions and international logistics projects. His first motto is to provide complete customer satisfaction and deliver the goods at the right time at the right place.
        </p>
        `
    }
};

const teamModal = document.getElementById("teamModal");

document.querySelectorAll(".open-team-modal").forEach(button => {

    button.addEventListener("click", function (e) {
        e.preventDefault();

        const card = this.closest(".card");
        const projectId = card.dataset.projectId;
        const data = teamData[projectId];

        if (data) {

            // const img = card.querySelector("img").src;
            const name = card.querySelector(".title").innerText;
            const designation = card.querySelector(".designation").innerText;

            document.getElementById("teamMemberTitle").innerHTML = name;
            document.getElementById("teamMemberImg").src = data.img;
            document.getElementById("teamMemberDesignation").innerHTML = designation;
            document.getElementById("teamMemberDesc").innerHTML = data.description;

            teamModal.style.display = "block";
            document.body.classList.add("overflow-hidden");
        }

    });

});

function closeProductsModal() {
    teamModal.style.display = "none";
    document.body.classList.remove("overflow-hidden");
}

document.querySelector(".close-btn-products").onclick = closeProductsModal;

window.addEventListener("click", function (e) {
    if (e.target === teamModal) {
        closeProductsModal();
    }
});

document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
        closeProductsModal();
    }
});
