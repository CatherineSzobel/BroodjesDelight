document.addEventListener("DOMContentLoaded", () => {
    const editButton = document.getElementById("editButton");
    const editSelect = document.getElementById("editSandwichSelect");
    const sandwichName = document.getElementById("sandwichName");
    const sandwichPrice = document.getElementById("sandwichPrice");
    const sandwichPicture = document.getElementById("sandwichPicture");
    const sandwichDescription = document.getElementById("sandwichDescription");
    const hiddenSandwichInput = document.querySelector('input[name="sandwich_id"]');

    editButton.addEventListener("click", () => {
        editSelect.classList.toggle("hidden");
    });

    editSelect.addEventListener("change", () => {
        const selectedOption = editSelect.options[editSelect.selectedIndex];

        // Update frontend
        sandwichName.textContent = selectedOption.dataset.name;
        sandwichPrice.textContent = `€${selectedOption.dataset.price}`;
        sandwichPicture.src = `img/broodjes/${selectedOption.dataset.picture}`;
        sandwichDescription.textContent = selectedOption.dataset.description;
        hiddenSandwichInput.value = selectedOption.value;
        fetch('update_sandwich.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `sandwich_id=${selectedOption.value}`
        })
            .then(res => res.json())
            .then(data => {
                console.log("Backend updated:", data);
            })
            .catch(err => console.error("Error updating backend:", err));
    });
});
