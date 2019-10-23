import React, { useState, useEffect } from 'react'
import { withRouter } from 'react-router-dom'
import useGlobal from '../store/store'

const LevelDetails = (props) => {
    const [globalState, globalActions] = useGlobal();
    const [r, setR] = useState();

    const handler = () => {
        if (props.child.type === 'picture') {
            let currLvl = props.child.level - 1;
            let currBranch = globalState.tree.get(currLvl)
            let pics = [];
            for (const node of currBranch) {
                if (node.type === 'picture' && node.id !== props.child.id) {
                    pics.push(node.url)
                }
            }
            props.history.push({
                pathname: 'picture',
                currUrl: props.child.url,
                pics: pics
            })
            return;
        }
        if (globalState.expanded !== props.child.id) {
            globalActions.setExpanded(props.child.id);
            globalActions.clearSublevels(props.child.level);
            globalActions.getTree(props.child.id);
        }
    }

    useEffect(() => {
        function toRadians(angle) {
            return angle * (Math.PI / 180);
        }

        let fraction = 90 / props.len
        let angle = -props.index * fraction
        let x = props.index * 2 * Math.cos(toRadians(angle))
        let y = -props.index * 0.5 * Math.sin(toRadians(angle))
        setR(`translate(${x}rem, ${y}rem)`)
    }, [props])

    return (
        <React.Fragment>
            <div style={{
                backgroundColor: globalActions.setNodeColor(props.child.id, props.child.type),
                transform: r
            }}
                className="roundbutton" onClick={handler}>
                {props.child.id}
            </div>
        </React.Fragment>

    )
}

export default withRouter(LevelDetails)