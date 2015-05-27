// file: PlayDestroyButtonGUI.cs
using UnityEngine;
using System.Collections;

public class PlayDestroyButtonGUI : MonoBehaviour{
	public AudioDestructBehaviour myAudioDestructObect;
	
	private void OnGUI(){
		bool playButtonWasClicked = GUILayout.Button("play");
		bool destroyButtonWasClicked = GUILayout.Button("play then destroy");

		if( playButtonWasClicked ){
			myAudioDestructObect.audio.Play();
		}
		
		if( destroyButtonWasClicked ){
			myAudioDestructObect.audio.Play();
			myAudioDestructObect.enabled = true;
		}
	}
}