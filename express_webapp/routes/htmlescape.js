//https://stackoverflow.com/a/30970751
module.exports = function escape(string) {
    const lookup = {
        '&': "&amp;",
        '"': "&quot;",
        '\'': "&apos;",
        '<': "&lt;",
        '>': "&gt;"
    };
    return string.replace(/[&"'<>]/g, c => lookup[c]);
};