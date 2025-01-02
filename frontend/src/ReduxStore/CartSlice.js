import { createSlice } from "@reduxjs/toolkit";
import {
  calculateTheTotalAmount,
  findOrderlinesWithSameProduct,
} from "../Utils/functions";

const CartSlice = createSlice({
  name: "cart",
  initialState: {
    order: JSON.parse(localStorage.getItem("order"))
      ? JSON.parse(localStorage.getItem("order"))
      : [],
    orderTotal: JSON.parse(localStorage.getItem("order"))
      ? calculateTheTotalAmount(JSON.parse(localStorage.getItem("order")))
      : 0,
    hiden: true,
  },
  reducers: {
    addProductToCart: (state, action) => {
      const Orderline = action.payload;
      state.hiden = false;
      if (state.order.length === 0) {
        Orderline.id = 1;
        Orderline.units = 1;
        state.order.push(Orderline);
      } else {
        const IndexOfSimilarOrderline = findOrderlinesWithSameProduct(
          Orderline,
          state.order
        );
        if (IndexOfSimilarOrderline === -1) {
          Orderline.id = state.order[state.order.length - 1].id + 1;
          Orderline.units = 1;
          state.order.push(Orderline);
        } else {
          state.order[IndexOfSimilarOrderline].units += 1;
        }
      }
      state.orderTotal = calculateTheTotalAmount(state.order);
      localStorage.setItem("order", JSON.stringify(state.order));
    },
    toggleHideBtn: (state) => {
      state.hiden = !state.hiden;
    },
    increaseUnits: (state, action) => {
      const itemId = action.payload;
      const itemIndex = state.order.findIndex(
        (placedOrderLine) => placedOrderLine.id === itemId
      );
      if (itemIndex !== -1) {
        state.order[itemIndex].units += 1;
      }
      state.orderTotal = calculateTheTotalAmount(state.order);
      localStorage.setItem("order", JSON.stringify(state.order));
    },
    decreaseUnits: (state, action) => {
      const itemId = action.payload;
      const itemIndex = state.order.findIndex(
        (placedOrderLine) => placedOrderLine.id === itemId
      );
      if (itemIndex !== -1) {
        if (state.order[itemIndex].units > 1) {
          state.order[itemIndex].units -= 1;
        } else {
          state.order.splice(itemIndex, 1);
        }
      }
      state.orderTotal = calculateTheTotalAmount(state.order);
      localStorage.setItem("order", JSON.stringify(state.order));
    },
    emptyTheCart: (state) => {
      state.order = [];
      state.orderTotal = 0;
      localStorage.setItem("order", JSON.stringify(state.order));
    },
  },
});

export const {
  addProductToCart,
  toggleHideBtn,
  decreaseUnits,
  increaseUnits,
  emptyTheCart,
} = CartSlice.actions;
export default CartSlice.reducer;
