function confirmDelete(event) {
    if (!confirm("Are you sure you want to delete this item?")) {
        event.preventDefault(); // stop the link if user clicks "Cancel"
    }
}
