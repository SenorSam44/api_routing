const NotificationService = {
    info(text = "This is info", title = "Info") {
        this.$toastr('info', text, title)
    },

    success(text = "This is info", title = "Success") {
        this.$toastr('success', text, title)
    },

    error(title = "Error", text = "This is info",) {
        this.$toastr('error', text, title)
    },

}

export default NotificationService;
