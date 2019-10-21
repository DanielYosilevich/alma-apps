import React from 'react';
import useGlobalHook from 'use-global-hook';
import actions from './actions/actions-config';

const tree = new Map();
tree.set(0, [{ id: 1, level: 1, type: 'folder' }]);


const initialState = {
  tree,
  expanded: -1
};

const useGlobal = useGlobalHook(React, initialState, actions);

export default useGlobal;