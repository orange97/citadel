// file: AudioDestructBehaviour.cs
using UnityEngine;
using System.Collections;

public class AudioDestructBehaviour : MonoBehaviour {
	private void Update()
	{
		if( !audio.isPlaying ) 
			Destroy(gameObject);
	}
}
