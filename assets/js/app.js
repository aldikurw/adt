function showToast(success, message) {
    let background;
    if (success) {
        background = "linear-gradient(135deg, #73a5ff, #5477f5)";
    } else {
        background = "linear-gradient(to right, rgb(255, 95, 109), rgb(255, 195, 113))";
    }

    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        style: {
            background: background
        },
        stopOnFocus: true,
    }).showToast();
}

function formDataToJson(formData) {
    let data = Object.fromEntries(formData);
    data = JSON.stringify(data);
    return data;
}