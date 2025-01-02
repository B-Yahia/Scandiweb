import { configureStore } from "@reduxjs/toolkit";
import CartReducer from "./CartSlice";
import AttributeReducer from "./AttributesSlice";

export default configureStore({
  reducer: {
    cart: CartReducer,
    attributes: AttributeReducer,
  },
});
