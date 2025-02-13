import typescriptPlugin from "@typescript-eslint/eslint-plugin";
import wordpressPlugin from "@wordpress/eslint-plugin";
import typescriptParser from "@typescript-eslint/parser";
import prettierPlugin from "eslint-plugin-prettier";

export default [
  {
    files: ["**/*.{js,ts}"],
    languageOptions: {
      parser: typescriptParser,
      parserOptions: {
        ecmaVersion: 2020,
        sourceType: "module",
      },
      globals: {
        window: "readonly",
        document: "readonly",
        jQuery: "readonly",
        module: "readonly",
        require: "readonly",
      },
    },
    plugins: {
      "@typescript-eslint": typescriptPlugin,
      "@wordpress": wordpressPlugin,
      prettier: prettierPlugin,
    },
    rules: {
      // Include rules from @wordpress/eslint-plugin/recommended
      ...wordpressPlugin.configs.recommended.rules,

      // Include rules from @typescript-eslint/recommended
      ...typescriptPlugin.configs.recommended.rules,

      // Add Prettier rules
      "prettier/prettier": "error",
    },
  },
  {
    ignores: ["dist/", "build/", "node_modules/", "*.min.js"],
  },
];
