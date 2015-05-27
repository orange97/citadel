// file: RecordMovements.cs
using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class RecordMovements : MonoBehaviour {
	public Transform leftHand;
	public Transform redCube;
	private bool isRecording = false;
	private List<ObjectAtFrame> movementList = new List<ObjectAtFrame>();
	private int currentFrame = 0;
	
	private void OnGUI() {
		
		if( !isRecording ) {
			bool startRecordingButtonClicked = GUILayout.Button ("START recording");
			if( startRecordingButtonClicked ) {
				isRecording = true;
				movementList.Clear();
			}
		}
		else {
			GUILayout.Label ( "RECORDING --------------------" );
			GUILayout.Label("number of frames record = " + movementList.Count);
			bool stopRecordingButtonClicked = GUILayout.Button ("STOP recording");
			if( stopRecordingButtonClicked ){
				isRecording = false;
			}
		}
	}

	private void Update () {
		if( isRecording )
			StoreFrame();
		else
			if( movementList.Count > 0)
				PlayBackFrame();
	}
	
	private void StoreFrame() {
		ObjectAtFrame leftHandAtFrame = new ObjectAtFrame(leftHand.position, leftHand.rotation);
		movementList.Add (leftHandAtFrame);
	}
	
	private void PlayBackFrame(){
		currentFrame++;
		if( currentFrame > (movementList.Count -1))
			currentFrame = 0;
		
		ObjectAtFrame objectNow = movementList[currentFrame] as ObjectAtFrame;
		redCube.position = objectNow.position;
		redCube.rotation = objectNow.rotation;
	}
	
}
