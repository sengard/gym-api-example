import React from 'react';
import { Scene, Actions } from 'react-native-router-flux';
import List from '../components/mediaobject/List';
import Create from '../components/mediaobject/Create';
import Show from '../components/mediaobject/Show';
import Update from '../components/mediaobject/Update';
import {delayRefresh} from '../utils/helpers';

export default [
          <Scene
              rightTitle="Add"
              onRight={() => Actions.mediaobjectCreate()}
              key="mediaobjectList" component={List}
              title="List of MediaObjects"
              initial
          />,
          <Scene key="mediaobjectCreate" component={Create}
                 title="Add a new mediaobject"/>,
          <Scene key="mediaobjectShow" component={Show}
                 title="MediaObject"
                 leftTitle="< List of MediaObjects"
                 onLeft={() => {
                   Actions.pop();
                   delayRefresh();
                 }}/>,
          <Scene key="mediaobjectUpdate" component={Update}
                 title="Update MediaObject"/>,
];
