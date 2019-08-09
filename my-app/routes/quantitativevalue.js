import React from 'react';
import { Scene, Actions } from 'react-native-router-flux';
import List from '../components/quantitativevalue/List';
import Create from '../components/quantitativevalue/Create';
import Show from '../components/quantitativevalue/Show';
import Update from '../components/quantitativevalue/Update';
import {delayRefresh} from '../utils/helpers';

export default [
          <Scene
              rightTitle="Add"
              onRight={() => Actions.quantitativevalueCreate()}
              key="quantitativevalueList" component={List}
              title="List of QuantitativeValues"
              initial
          />,
          <Scene key="quantitativevalueCreate" component={Create}
                 title="Add a new quantitativevalue"/>,
          <Scene key="quantitativevalueShow" component={Show}
                 title="QuantitativeValue"
                 leftTitle="< List of QuantitativeValues"
                 onLeft={() => {
                   Actions.pop();
                   delayRefresh();
                 }}/>,
          <Scene key="quantitativevalueUpdate" component={Update}
                 title="Update QuantitativeValue"/>,
];
