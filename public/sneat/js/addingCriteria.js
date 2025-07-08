let criteriaIndex = 1;
const maxCriteria = 5;

function addCriteriaField() {
    if (criteriaIndex >= maxCriteria) return;

    const wrapper = document.getElementById("criteria-wrapper");

    const group = document.createElement("div");
    group.className = "mb-3 criteria-group";

    const label = document.createElement("label");
    label.className = "form-label";
    label.setAttribute("for", `criteria-name-${criteriaIndex}`);
    label.textContent = `Name of Criteria ${criteriaIndex + 1}`;

    const input = document.createElement("input");
    input.type = "text";
    input.className = "form-control";
    input.id = `criteria-name-${criteriaIndex}`;
    input.name = "name[]";
    input.placeholder = "e.g. Stage Presence";
    input.required = true;

    group.appendChild(label);
    group.appendChild(input);
    wrapper.appendChild(group);

    criteriaIndex++;

    if (criteriaIndex >= maxCriteria) {
        document.getElementById("add-criteria-btn").remove();
    }
}

function clearCriteriaFields() {
    const wrapper = document.getElementById("criteria-wrapper");
    wrapper.innerHTML = `
            <div class="mb-3 criteria-group">
                <label class="form-label" for="criteria-name-0">Name of Criteria 1</label>
                <input type="text" class="form-control" id="criteria-name-0" name="name[]" placeholder="e.g. Vocal Quality" required />
            </div>
        `;
    criteriaIndex = 1;

    // Restore the Add button if removed
    if (!document.getElementById("add-criteria-btn")) {
        const buttons = document.getElementById("criteria-buttons");
        const addBtn = document.createElement("button");
        addBtn.type = "button";
        addBtn.className = "btn btn-secondary me-2";
        addBtn.textContent = "+ Add Another Criteria";
        addBtn.id = "add-criteria-btn";
        addBtn.setAttribute("onclick", "addCriteriaField()");
        buttons.insertBefore(addBtn, buttons.firstChild);
    }
}
