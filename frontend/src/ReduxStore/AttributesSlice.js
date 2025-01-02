import { createSlice } from "@reduxjs/toolkit";

const AttributesSlice = createSlice({
  name: "attributes",
  initialState: {
    list: [],
  },
  reducers: {
    AddAttribute: (state, action) => {
      const data = action.payload;
      const attrIndex = state.list.findIndex(
        (item) => data.attributeSet.id === item.attributeSet.id
      );

      if (attrIndex === -1) {
        state.list.push(data);
      } else {
        state.list[attrIndex] = data;
      }
    },
    EmptyAttributesList: (state, action) => {
      state.list = [];
    },
  },
});

export const { AddAttribute, EmptyAttributesList } = AttributesSlice.actions;
export default AttributesSlice.reducer;
