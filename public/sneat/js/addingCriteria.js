let criteriaIndex = 1;

function addCriteriaField() {
    const wrapper = document.getElementById("criteria-wrapper");

    const group = document.createElement("div");
    group.className = "mb-3 criteria-group";

    const label = document.createElement("label");
    label.className = "form-label";
    label.setAttribute("for", `criteria-name-${criteriaIndex}`);
    label.textContent = `Name of Criteria ${criteriaIndex + 1}`; // ✅ numbered label

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
}
