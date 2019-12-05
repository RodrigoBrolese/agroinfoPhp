import styled, { injectGlobal } from "vue-styled-components";

injectGlobal`
  :root {
    --primary-color-dark: #27632a;
    --primary-color: #388e3c;
    --primary-color-ligth: #5fa463;
    --secundary-color-dark: #7cb23e;
    --secundary-color: #b2ff59;
    --secundary-color-ligth: #c1ff7a;
  }

  html {
    font-family: "Roboto", sans-serif;
  }
`;
