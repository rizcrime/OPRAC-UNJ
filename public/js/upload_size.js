function validateSize(input, sizeReq) {
    const fileSize = input.files[0].size / sizeReq / sizeReq; // in MiB
    if (fileSize > 2) {
        alert(`Ukuran melebihi ${sizeReq} Kb`);
        $(file).val(""); //for clearing with Jquery
    }
}

