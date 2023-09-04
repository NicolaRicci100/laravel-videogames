console.log("Js Loaded");

const deleteForms = document.querySelectorAll(".delete-form");

deleteForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        const projectName = form.dataset.name;

        let hasConfirmed = "";

        if (projectName) {
            hasConfirmed = confirm(
                `Are you sure that you want to delete ${projectName}?`
            );
        } else {
            hasConfirmed = confirm(`Are you sure that you want to delete all?`);
        }

        if (hasConfirmed) form.submit();
    });
});
