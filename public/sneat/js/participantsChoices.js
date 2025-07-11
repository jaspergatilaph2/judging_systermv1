function updateContestTypes() {
    const category = document.getElementById("contest-category").value;
    const typeSelect = document.getElementById("contest-type");
    const container = document.getElementById("group-name-container");

    // Reset type select and group name container
    typeSelect.innerHTML = '<option value="" selected disabled>-- Select Contest Type --</option>';
    container.innerHTML = "";

    let types = [];

    switch (category) {
        case "Singing Contest":
        case "Dance Contest":
        case "Talent Show":
        case "Battle of the Bands":
            types = ["Solo", "Duo", "Group"];
            break;
        case "Pageant":
        case "Mr. & Ms. Contest":
        case "Modeling Contest":
        case "Spoken Word / Poetry":
            types = ["Individual"];
            break;
        case "Quiz Bee":
        case "Debate":
            types = ["Individual", "Team"];
            break;
        case "Essay Writing":
        case "Poster Making":
        case "Drawing Contest":
        case "Photography Contest":
        case "Cooking Contest":
            types = ["Individual"];
            break;
        case "Cosplay Competition":
            types = ["Solo", "Group"];
            break;
    }

    types.forEach(function (type) {
        const option = document.createElement("option");
        option.value = type;
        option.textContent = type;
        typeSelect.appendChild(option);
    });

    // Add change event listener (clear any existing first)
    typeSelect.onchange = function () {
        const selected = this.value;
        container.innerHTML = "";

        if (selected === "Group" || selected === "Team") {
            const label = document.createElement("label");
            label.setAttribute("for", "group-name");
            label.className = "form-label";
            label.textContent = "Enter Group/Team Name";

            const input = document.createElement("input");
            input.type = "text";
            input.name = "group_team"; // <- consistent name
            input.id = "group-name";
            input.className = "form-control mt-2";
            input.placeholder = "e.g. Team Alpha";

            container.appendChild(label);
            container.appendChild(input);
        }
    };
}

function ContestTypes(id) {
    const category = document.getElementById("contest-category-" + id).value;
    const typeSelect = document.getElementById("contest-type-" + id);
    const container = document.getElementById("group-name-container-" + id);

    typeSelect.innerHTML = '<option value="" disabled selected>-- Select Contest Type --</option>';
    container.innerHTML = "";

    let types = [];

    switch (category) {
        case "Singing Contest":
        case "Dance Contest":
        case "Talent Show":
        case "Battle of the Bands":
            types = ["Solo", "Duo", "Group"];
            break;
        case "Pageant":
        case "Mr. & Ms. Contest":
        case "Modeling Contest":
        case "Spoken Word / Poetry":
            types = ["Individual"];
            break;
        case "Quiz Bee":
        case "Debate":
            types = ["Individual", "Team"];
            break;
        case "Essay Writing":
        case "Poster Making":
        case "Drawing Contest":
        case "Photography Contest":
        case "Cooking Contest":
            types = ["Individual"];
            break;
        case "Cosplay Competition":
            types = ["Solo", "Group"];
            break;
    }

    types.forEach(function (type) {
        const option = document.createElement("option");
        option.value = type;
        option.textContent = type;
        typeSelect.appendChild(option);
    });

    // Add change event listener (reset before setting)
    typeSelect.onchange = function () {
        const selected = this.value;
        container.innerHTML = "";

        if (selected === "Group" || selected === "Team") {
            const label = document.createElement("label");
            label.setAttribute("for", "group-name-" + id);
            label.className = "form-label";
            label.textContent = "Enter Group/Team Name";

            const input = document.createElement("input");
            input.type = "text";
            input.name = "group_team"; // <- consistent name for Laravel
            input.id = "group-name-" + id;
            input.className = "form-control mt-2";
            input.placeholder = "e.g. Team Beta";

            container.appendChild(label);
            container.appendChild(input);
        }
    };
}
