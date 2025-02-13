export default {
    extends: ["@wordpress/stylelint-config"],
    rules: {
      // Add custom rules here
    },
    ignoreFiles: [
      "dist/**/*.css",
      "build/**/*.css",
      "node_modules/**/*.css",
      "**/*.min.css"
    ]
};