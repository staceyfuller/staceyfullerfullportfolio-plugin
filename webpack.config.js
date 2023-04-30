const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
  ...defaultConfig,
  entry: {
    ...defaultConfig.entry,
    // list all other js files that need to be built including those in custom blocks
  },
  // plugins: [
  //   ...defaultConfig.plugins,
  //   new CopyPlugin({
  //     patterns: [{ from: "src/shared-resources/images", to: "shared-resources/images" }],
  //   }),
  // ],
};
