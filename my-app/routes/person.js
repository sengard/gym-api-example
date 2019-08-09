import React from 'react';
import { Scene, Actions } from 'react-native-router-flux';
import List from '../components/person/List';
import Create from '../components/person/Create';
import Show from '../components/person/Show';
import Update from '../components/person/Update';
import {delayRefresh} from '../utils/helpers';

export default [
          <Scene
              rightTitle="Add"
              onRight={() => Actions.personCreate()}
              key="personList" component={List}
              title="List of Persons"
              initial
          />,
          <Scene key="personCreate" component={Create}
                 title="Add a new person"/>,
          <Scene key="personShow" component={Show}
                 title="Person"
                 leftTitle="< List of Persons"
                 onLeft={() => {
                   Actions.pop();
                   delayRefresh();
                 }}/>,
          <Scene key="personUpdate" component={Update}
                 title="Update Person"/>,
];
